<?php

namespace Rizlantamima\ElasticQuent;

use Elasticsearch\ClientBuilder;

class Elastic
{

	protected $host;
	protected $port = '9200' ;
	protected $scheme = 'http';	
	protected $index;	
	protected $username;
	protected $password;

	public function __construct($index)
	{	
		$this->index = $index;
	}

    public function setHost($value){
        $this->host = $value;
        return $this;
    }

    public function setPort($value){
        $this->port = $value;
        return $this;
    }

    public function setScheme($value){
        $this->scheme = $value;
        return $this;
    }

    public function setIndex($value){
        $this->index = $value;
        return $this;
    }

    public function setUsername($value){
        $this->username = $value;
        return $this;
    }

    public function setPassword($value){
        $this->password = $value;
        return $this;
    }	

	public function findOrFail($id)
    {

    	$hosts = [
    		[
    			'host' => $this->host, 
    			'port' => $this->port, 
    			'scheme' => $this->scheme, 
    			'user' => $this->username, 
    			'pass' => $this->password
    		]
    	];

    	$client = ClientBuilder::create()->setHosts($hosts)->build();

    	$params = [
    		'index' => $this->index,
    		'type' => 'doc',
    		'id' => $id
    	];

    	return $client->get($params);
    }

    public function get($index = null)
    {
    	$index = $index == null ? $this->index : $index;

    	$hosts = [
    		[
    			'host' => $this->host, 
    			'port' => $this->port, 
    			'scheme' => $this->scheme, 
    			'user' => $this->username, 
    			'pass' => $this->password
    		]
    	];

    	$client = ClientBuilder::create()->setHosts($hosts)->build();

    	$params = [
    		'index' => $index,
    		'type' => '_doc',
    		'body' => []
    	];

    	return $client->search($params);
    }

}