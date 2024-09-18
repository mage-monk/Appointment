<?php
declare(strict_types=1);

namespace  MageMonk\Appointment\Block\Adminhtml\Appointment\Edit;

use Magento\Search\Controller\RegistryConstants;
use Magento\Framework\UrlInterface;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * Registry
     *
     * @var Registry
     */
    protected Registry $registry;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Registry $registry
     */
    public function __construct(
       Context $context,
        Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Return the synonyms group id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        $appointment = $this->registry->registry('appointment');
        return $appointment ? $appointment->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return  string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
