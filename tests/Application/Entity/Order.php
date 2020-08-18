<?php
declare(strict_types=1);

namespace Tests\MangoSylius\LabelsPlugin\Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use MangoSylius\LabelsPlugin\Entity\OrderInterface;
use MangoSylius\LabelsPlugin\Entity\OrderTrait;
use Sylius\Component\Core\Model\Order as BaseOrder;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sylius_order")
 */
class Order extends BaseOrder implements OrderInterface
{
    use OrderTrait;
}