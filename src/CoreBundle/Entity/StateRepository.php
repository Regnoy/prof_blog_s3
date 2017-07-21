<?php


namespace CoreBundle\Entity;



use Doctrine\ORM\EntityRepository;

class StateRepository extends EntityRepository {

  private $_entity;

  public function get($key){//user.2.recover_password
    if( is_array($key) ){
      $key = implode('.', $key);
    }
    $states = $this->getMultiple([$key]);
    if(is_array($states))
      $states = array_shift($states);
    return $states;
  }

  public function set( $key, $value = null, $expired = null ){
    $newState = [
      'key' => $key,
      'value' => $value,
      'expired' => $expired
    ];
    $states = $this->setMultiple([$newState]);

    $state = array_shift($states);
    return $state;
  }
  public function remove($key){
    if( is_array($key) ){
      $key = implode('.', $key);
    }
    $this->_em->remove($key);
    $this->_em->flush();
  }

  public function setMultiple( array $states){
    // [0 => ['key'=>'asdasd', 'value'=>'asdasd', 'expired' =>'asda']]
    $newState = [];

    foreach ($states as $k => $state){

      if((!isset($state['key']) || !isset($state['value'])) && !($state instanceof State))
        continue;

      $key = implode('.', $state['key']);
      if(isset($this->_entity[$key])){
        /** @var State $existState */
        $existState = $this->_entity[$key];
        $newState[$key] =$existState;
        $existState->setValue($state['value']);
        if(isset($state["expired"])){
          $existState->setExpired($state["expired"]);
        }
        continue;
      }
      $stateInstance = new State();
      $stateInstance->setCollection($key)->setValue(serialize($state['value']));
      if(isset($state["expired"]) && !is_null($state["expired"])){
        $stateInstance->setExpired($state["expired"]);
      }
      $newState[$key] = $stateInstance;
    }

    /** @var State $state */
    foreach ($newState as $state){
      $this->_em->merge($state);
      $this->_entity[$state->getCollection()] = $state;
    }
    $this->_em->flush();
    return $newState;
  }

  public function getMultiple( array $states){
    foreach ($states as $k => $state){
      if(is_array($state)){
        $key = implode('.', $state);
        unset($states[$k]);
        $states[$key] = $key;
      }
    }
    $stateEntity = [];
    foreach ($states as $k => $state){
      if(isset($this->_entity[$k])){
        $stateEntity[$k] = $this->_entity[$k];
        unset($states[$k]);
      }
    }

    if($states)
      $states = $this->findByCollection($states);

    if($states){
      /** @var State $state */
      foreach ($states as $state){
        $stateEntity[$state->getCollection()] = $state;
        $this->_entity[$state->getCollection()] = $state;
      }

    }

    return $stateEntity;
  }
  public function createInstance($key, $value = null, $expired = null){
    if(is_array($key)){
      $key = implode('.', $key);
    }
    $state = new State();
    $state->setCollection($key)->setValue($value)->setExpired($expired);
    return $state;
  }

  public function getValue($key, $default = null){
    if(is_array($key)){
      $key = implode('.', $key);
    }
    $state = $this->get($key);

    return $state ? $state->getValue() : $default;
  }

}

