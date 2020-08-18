<?php

declare(strict_types=1);

namespace MangoSylius\LabelsPlugin\Service;

use Doctrine\ORM\EntityRepository;
use MangoSylius\LabelsPlugin\Entity\LabelInterface;
use MangoSylius\LabelsPlugin\Repository\LabelRepositoryInterface;
use SM\Factory\Factory;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\Component\Core\OrderCheckoutStates;
use Sylius\Component\Core\OrderPaymentStates;
use Sylius\Component\Core\OrderShippingStates;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Sylius\Component\Core\Updater\UnpaidOrdersStateUpdaterInterface;
use Sylius\Component\Order\OrderTransitions;

interface LabelServiceInterface
{
    /**
     * @return LabelInterface[]
     */
    public function fetchLabels();
}
