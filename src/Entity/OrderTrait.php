<?php
namespace MangoSylius\LabelsPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\ORM\Mapping as ORM;

trait OrderTrait
{
    /**
     * @ManyToMany(targetEntity="MangoSylius\LabelsPlugin\Entity\Label")
     * @JoinTable(name="mangoweb_label_order",
     *     joinColumns={@JoinColumn(name="order_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="label_id", referencedColumnName="id")}
     *     )
     */
    protected $labels = [];

    /**
     * @return Collection|LabelInterface[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels($labels): void
    {
        $this->labels = $labels;
    }
}