<?php
namespace MangoSylius\LabelsPlugin\Twig;

use MangoSylius\LabelsPlugin\Service\LabelServiceInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LabelsExtension extends AbstractExtension
{
    /**
     * @var LabelServiceInterface
     */
    protected $labelService;

    /**
     * @param LabelServiceInterface $labelService
     */
    public function __construct(LabelServiceInterface $labelService)
    {
        $this->labelService = $labelService;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('mango_labels', [$this, 'fetchLabels'])
        ];
    }

    /**
     * @return \MangoSylius\LabelsPlugin\Entity\LabelInterface[]
     */
    public function fetchLabels()
    {
        return $this->labelService->fetchLabels();
    }
}