<?php

namespace Tests\MangoSylius\LabelsPlugin\Behat\Context\Ui\Admin;
use Behat\Behat\Context\Context;
use MangoSylius\LabelsPlugin\Entity\Label;
use MangoSylius\LabelsPlugin\Entity\LabelInterface;
use MangoSylius\LabelsPlugin\Repository\LabelRepositoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class ManagingLabelsContext implements Context
{
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepository;

    /**
     * ManagingLabelsContext constructor.
     *
     * @param LabelRepositoryInterface $labelRepository
     */
    public function __construct(LabelRepositoryInterface $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    /**
     * @Given /^there is a label with name "([^"]*)"$/
     */
    public function thereIsALabel($labelName)
    {
        $label = new Label();
        /** @var LabelInterface $label */
        $label->setName($labelName);
        $this->labelRepository->add($label);
    }
}