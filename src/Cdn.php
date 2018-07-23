<?php
/**
 * Created by PhpStorm.
 * User: birjemin
 * Date: 23/07/2018
 * Time: 11:13
 */
namespace Birjemin\AliyunCdn;


use Birjemin\AliyunCdn\Exception\CdnException;
use Wenpeng\Curl\Curl;

/**
 * Class Cdn
 */
class Cdn implements CdnInterface
{
    /** @var string $result */
    private $result;

    /**
     * @param string $path
     * @param int $type
     *
     * @return array|string
     * @throws \Exception
     */
    public function refreshCache(string $path, int $type = self::TYPE_DIRECTORY)
    {
        return $this->execute([
            'Action'     => self::ACTION_REFRESH_OBJECT_CACHES,
            'ObjectPath' => $path,
            'ObjectType' => $type == self::TYPE_DIRECTORY ? 'Directory' : 'File'
        ]);
    }

    /**
     * @param string $taskId
     *
     * @return array|string
     */
    public function getRefreshResult(string $taskId)
    {
        return $this->execute([
            'Action' => self::ACTION_DESCRIBE_REFRESH_TASKS,
            'TaskId' => $taskId
        ]);
    }

    /**
     * @param array $params
     *
     * @return string
     */
    private function execute(array $params)
    {
        try {
            $this->result = Curl::init()->url($this->buildUrl($params))->data();
            return $this->parseResult();
        } catch (\Exception $e) {
            throw new CdnException('execute error', (array)$e->getMessage());
        }
    }

    /**
     * @param array $param
     *
     * @return string
     */
    private function buildUrl(array $param)
    {
        return self::API_URL . '?' . http_build_query((new Sign($param))->buildParams());
    }

    /**
     * parse result
     * @return string
     */
    private function parseResult()
    {
        return $this->result;
    }
}