<?php 

namespace Marshmallow\Breadcrumb;

class Crumb
{
	protected $name;
	protected $iconClass;
	protected $url;
	protected $current = false;

	public function setName ($name)
	{
		$this->name = $name;
		return $this;
	}

	public function setIconClass ($iconClass)
	{
		$this->iconClass = $iconClass;
		return $this;
	}

	public function setRoute ($route, $params = [])
	{
		$this->url = route($route, $params);
		return $this;
	}

	public function setUrl ($url)
	{
		$this->url = $url;
		return $this;
	}

	public function isCurrent ()
	{
		$this->current = true;
		return $this;
	}

	public function hasLink ()
	{
		return ($this->url);
	}
	
	public function hasIcon ()
	{
		return ($this->iconClass);
	}

	public function __get ($param)
	{
		return $this->{$param};
	}

}