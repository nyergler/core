<?php
/** Freesewing\Themes\Designer class */
namespace Freesewing\Themes;

use Freesewing\Context;
use Freesewing\Patterns\Pattern;

/**
 * Freesewing\Themes\Developer class.
 *
 * @author    Joost De Cock <joost@decock.org>
 * @copyright 2016 Joost De Cock
 * @license   http://opensource.org/licenses/GPL-3.0 GNU General Public License, Version 3
 */
class Developer extends Theme
{

    /**
     * Outputs (the entire context object as Kint debug + SVG) as JSON
     *
     * @param \Freesewing\Context $context The context object
     *
     * @return \Freesewing\Response $response The response object with Kint+SVG
     */
    public function themeResponse(Context $context)
    {
        ob_start();
        \Kint::$maxLevels = 0;
        \Kint::dump($context);
        $debug = ob_get_clean();

        $response = new \Freesewing\Response();
        $response->setFormat('json');
        $response->setBody([
            'svg'   => "{$context->getSvgDocument()}",
            'debug' => $debug,
        ]);

        return $response;
    }

    /**
     * Loads message from pattern into messages property
     * Adds translations for our scalebox
     *
     * @param \Freesewing\Patterns\Pattern $pattern The pattern object
     */
    public function themePattern(Pattern $pattern)
    {
        $this->messages = $pattern->getMessages();
        $pattern->replace('__SCALEBOX_METRIC__', $pattern->t('__SCALEBOX_METRIC__'));
        $pattern->replace('__SCALEBOX_IMPERIAL__', $pattern->t('__SCALEBOX_IMPERIAL__'));
    }
}
