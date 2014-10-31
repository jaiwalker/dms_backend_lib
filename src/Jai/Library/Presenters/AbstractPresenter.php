<?php namespace Jai\Library\Presenters;

abstract class AbstractPresenter {

    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function __get($name)
    {
        if (method_exists($this, $name))
        {
            return $this->{$name}();
        }

        return $this->resource->{$name};
    }
    
      public function gravatar($size = 30)
		{
			$email = md5($this->email);
			
			return "//www.gravatar.com/avatar/{$email}?s={$size}";
			
		}
}