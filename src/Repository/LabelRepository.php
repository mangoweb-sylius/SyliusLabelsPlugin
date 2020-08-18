<?php

declare(strict_types=1);

namespace MangoSylius\LabelsPlugin\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use MangoSylius\ExtendedChannelsPlugin\Entity\HelloBarInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Channel\Model\ChannelInterface;

class LabelRepository extends EntityRepository implements LabelRepositoryInterface
{
}
