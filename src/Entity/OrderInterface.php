<?php
namespace MangoSylius\LabelsPlugin\Entity;

interface OrderInterface extends \Sylius\Component\Core\Model\OrderInterface {

    public function getLabels();

    public function setLabels(array $labels): void;
}