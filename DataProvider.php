<?php

namespace src\Integration;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

class DataProvider
{
	private $host;
	private $user;
	private $password;

	/*
	* @param $host
	* @param $user
	* @param $password
	*/
	public function __construct($params, CacheItemPoolInterface $cache, LoggerInterface $logger)
	{
		$this->logger = $logger;
		$this->params = $this->makeParams($params);
		$this->cache = $cache;
	}

	/*
	* From Request
	* 
	* @param array $request
	* @return array
	*/
	protected function makeRequest(array $request)
	{
		//Make request format
	}

	/*
	* Send Request
	*
	* @param array $request
	*/
	protected function sendRequest(array $request)
	{
		try {
			$request = $this->makeRequest($request);
			$cacheKey = $this->getCacheKey($request);
			$cacheItem = $this->cache->getItem($cacheKey);
			if ($cacheItem->isHit()) {
				return $cacheItem->get();
			}

			$result = $this->sendRequest($request);

			$result = $this->makeResponse($result);

			$cacheItem->set($result)->expiresAt((new DateTime())->modify('+1 day'));

			return $result;
		} catch (Exception $e) {
			$this->logger->critical('Error');
			throw new Exception($e->getMessage(), $e->getCode());
		}
	}


	/*
	* Form Response
	*
	* @param $response
	*/
	protected function makeResponse($response)
	{
		// Form Response object
	}

	/*
	* Form Params
	*
	* @param array $params
	*/
	protected function makeParams(array $params)
	{
		// From Params
	}

	/*
	* Form Cache key
	*
	* @param array $input
	* @return string 
	*/
	public function makeCacheKey(array $input)
	{
		return json_encode($input);
	}

}


//  Third task

function addLargeNumbers(string $num1, string $num2)
{
	return gmp_strval(gmp_add($num1, $num2));
}

echo addLargeNumbers('99999999999999999999999999999999999999999999999999999999999999999999', '32423423423432875873256293569327653982452839742');


