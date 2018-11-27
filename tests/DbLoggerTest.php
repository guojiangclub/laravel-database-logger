<?php


namespace iBrand\DatabaseLogger\Test;


class DbLoggerTest extends BaseTest
{
    protected function getLogFile(){
        return config('ibrand.dblogger.directory').DIRECTORY_SEPARATOR.$this->logger->getGuard().'-'.date('Y-m-d').'-log.sql';
    }

    public function testLog()
    {
        $user = User::find(1);
        $this->assertTrue(file_exists($this->getLogFile()));

        $this->logger->setGuard('api');
        User::find(1);
        $this->assertTrue(file_exists($this->getLogFile()));

        $this->logger->setGuard('api');
        $this->logger->setOperator($user);
        $this->assertTrue(file_exists($this->getLogFile()));
    }

    public function testMiddleware()
    {
        $response = $this->get('test');

        $response
            ->assertStatus(200);
    }
}