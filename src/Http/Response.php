<?php
namespace Angelfon\SDK\Http;

class Response
{
	protected $headers;
  protected $content;
  protected $statusCode;

	public function __construct($statusCode, $content, $headers = array())
	{
		$this->statusCode = $statusCode;
    $this->content = $content;
    $this->headers = $headers;
	}

	public function getContent()
	{
		return json_decode($this->content, true);
	}

  public function getStatusCode() 
  {
    return $this->statusCode;
  }

  public function getHeaders() 
  {
    return $this->headers;
  }

  public function ok() 
  {
    return $this->getStatusCode() < 400;
  }
  
  public function __toString() 
  {
    return '[Response] HTTP ' . $this->getStatusCode() . ' ' . $this->content;
  }
}