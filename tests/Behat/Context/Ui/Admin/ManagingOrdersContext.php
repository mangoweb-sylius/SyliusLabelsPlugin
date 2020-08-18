<?php

declare(strict_types=1);

namespace Tests\MangoSylius\LabelsPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Sylius\Component\Customer\Model\CustomerInterface;
use Tests\MangoSylius\LabelsPlugin\Behat\Page\Admin\Order\IndexPageInterface;
use Tests\MangoSylius\LabelsPlugin\Behat\Page\Admin\Order\ShowPageInterface;
use Webmozart\Assert\Assert;

final class ManagingOrdersContext implements Context
{
    /** @var IndexPageInterface */
    private $indexPage;

    /**
     * @var ShowPageInterface
     */
    private $showPage;

    public function __construct(
        IndexPageInterface $indexPage,
        ShowPageInterface $showPage
    ) {
        $this->indexPage = $indexPage;
        $this->showPage = $showPage;
    }
}
