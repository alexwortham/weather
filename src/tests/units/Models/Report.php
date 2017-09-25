<?php

namespace tests\unit\Models;

use mageekguy\atoum;

class Report extends atoum\test
{

    protected function getApp() {
        return new \App();
    }

    public function testBadSave() {
        $this->exception(
            function () {
                $app = $this->getApp();
                $em = $app['orm.em'];
                $report = \Models\Report::create();

                $em->persist($report);
                $em->flush();
            }
        );
    }

    public function testGoodSave() {
        $this->given(
            $report = \Models\Report::create(),
            $em = $this->getApp()['orm.em']
        )
            ->when(
                $report
                    ->setCondition("Foo")
                    ->setHumidity(0.0)
                    ->setPressure(0.0)
                    ->setTemperature(0.0)
                    ->setWindDirection(0.0)
                    ->setWindSpeed(0.0)
                    ->setZip("00000"))
            ->and(
                $em->persist($report),
                $em->flush()
            )
            ->then
                ->string($report->getCondition())
                    ->isEqualTo("Foo")
                ->float($report->getHumidity())
                    ->isEqualTo(0.0)
                ->float($report->getPressure())
                    ->isEqualTo(0.0)
                ->float($report->getTemperature())
                    ->isEqualTo(0.0)
                ->float($report->getWindDirection())
                    ->isEqualTo(0.0)
                ->float($report->getWindSpeed())
                    ->isEqualTo(0.0)
                ->string($report->getZip())
                    ->isEqualTo("00000")
                ->integer($report->getId())
                ->dateTime($report->getTimestamp());
    }

}