<?php

/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */

declare(strict_types=1);

namespace Elastic\Elasticsearch\Endpoints;

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Snapshot extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Removes stale data from repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/clean-up-snapshot-repo-api.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function cleanupRepository(array $params = [])
	{
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/_cleanup';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Clones indices from one snapshot into another snapshot in the same repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) The name of the snapshot to clone from
	 *     target_snapshot: string, // (REQUIRED) The name of the cloned snapshot to create
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     body: array, // (REQUIRED) The snapshot clone definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clone(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot','target_snapshot'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']) . '/_clone/' . urlencode((string) $params['target_snapshot']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Creates a snapshot in a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     wait_for_completion: boolean, // Should this request wait until the operation has completed before returning
	 *     body: array, //  The snapshot definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function create(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','wait_for_completion']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Creates a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     verify: boolean, // Whether to verify the repository after creation
	 *     body: array, // (REQUIRED) The repository definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function createRepository(array $params = [])
	{
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','verify']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Deletes one or more snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: list, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function delete(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Deletes a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: list, // (REQUIRED) Name of the snapshot repository to unregister. Wildcard (`*`) patterns are supported.
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteRepository(array $params = [])
	{
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns information about a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: list, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     ignore_unavailable: boolean, // Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
	 *     index_details: boolean, // Whether to include details of each index in the snapshot, if those details are available. Defaults to false.
	 *     include_repository: boolean, // Whether to include the repository name in the snapshot info. Defaults to true.
	 *     verbose: boolean, // Whether to show verbose snapshot info or only show the basic info found in the repository index blob
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function get(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','index_details','include_repository','verbose']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns information about a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: list, //  A comma-separated list of repository names
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRepository(array $params = [])
	{
		if (isset($params['repository'])) {
			$url = '/_snapshot/' . urlencode((string) $params['repository']);
			$method = 'GET';
		} else {
			$url = '/_snapshot';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','local']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Analyzes a repository for correctness and performance
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     blob_count: number, // Number of blobs to create during the test. Defaults to 100.
	 *     concurrency: number, // Number of operations to run concurrently during the test. Defaults to 10.
	 *     read_node_count: number, // Number of nodes on which to read a blob after writing. Defaults to 10.
	 *     early_read_node_count: number, // Number of nodes on which to perform an early read on a blob, i.e. before writing has completed. Early reads are rare actions so the 'rare_action_probability' parameter is also relevant. Defaults to 2.
	 *     seed: number, // Seed for the random number generator used to create the test workload. Defaults to a random value.
	 *     rare_action_probability: number, // Probability of taking a rare action such as an early read or an overwrite. Defaults to 0.02.
	 *     max_blob_size: string, // Maximum size of a blob to create during the test, e.g '1gb' or '100mb'. Defaults to '10mb'.
	 *     max_total_data_size: string, // Maximum total size of all blobs to create during the test, e.g '1tb' or '100gb'. Defaults to '1gb'.
	 *     timeout: time, // Explicit operation timeout. Defaults to '30s'.
	 *     detailed: boolean, // Whether to return detailed results or a summary. Defaults to 'false' so that only the summary is returned.
	 *     rarely_abort_writes: boolean, // Whether to rarely abort writes before they complete. Defaults to 'true'.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function repositoryAnalyze(array $params = [])
	{
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/_analyze';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['blob_count','concurrency','read_node_count','early_read_node_count','seed','rare_action_probability','max_blob_size','max_total_data_size','timeout','detailed','rarely_abort_writes']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Restores a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     wait_for_completion: boolean, // Should this request wait until the operation has completed before returning
	 *     body: array, //  Details of what to restore
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function restore(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']) . '/_restore';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','wait_for_completion']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns information about the status of a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, //  A repository name
	 *     snapshot: list, //  A comma-separated list of snapshot names
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     ignore_unavailable: boolean, // Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function status(array $params = [])
	{
		if (isset($params['repository']) && isset($params['snapshot'])) {
			$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/' . urlencode((string) $params['snapshot']) . '/_status';
			$method = 'GET';
		} elseif (isset($params['repository'])) {
			$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/_status';
			$method = 'GET';
		} else {
			$url = '/_snapshot/_status';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Verifies a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function verifyRepository(array $params = [])
	{
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . urlencode((string) $params['repository']) . '/_verify';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}