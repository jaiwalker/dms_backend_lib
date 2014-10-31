<?php  namespace Jai\Library\Traits; 
use App;
/**
 * Trait ConnectionTrait
 *
 * @author Jai beschi Jai@Jaibeschi.com
 */
trait ConnectionTrait {
  public function getConnectionName()
  {
    return (App::environment() != 'testing') ? 'authentication' : 'testbench';
  }
} 