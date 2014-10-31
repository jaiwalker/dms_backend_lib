<?php  namespace Jai\Library\Traits;
/**
 * Trait OverrideConnectionTrait
 *
 * @author Jai beschi Jai@Jaibeschi.com
 */
use App;

trait OverrideConnectionTrait {
    /**
     * @override
     * @return \Illuminate\Database\Connection
     */
    public function getConnection()
    {
        return (App::environment() != 'testing') ? static::resolveConnection('authentication'): static::resolveConnection($this->connection);
    }
} 