<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
    'pi_name'        => 'Kebab Case',
    'pi_version'     => '1.0',
    'pi_author'      => 'Steve Pedersen',
    'pi_author_url'  => 'http://www.bluecoastweb.com/',
    'pi_description' => 'Everybody loves a kebab',
    'pi_usage'       => Kebab_case::usage()
);

class Kebab_case {
    public function __construct() {
        $text = ee()->TMPL->fetch_param('text');
        $this->return_data = $this->_kebabify($text);
    }

    private function _kebabify($text) {
        return preg_replace('/-$/', '', preg_replace('/\W+/', '-', strtolower($text)));
    }

    public static function usage() {
        ob_start();
?>

Return text formatted like a kebab:

{exp:channel:entries}

  <div class="{exp:kebab_case text='{some_text_field}'}">
    {title} etc
  </div>

{/exp:channel:entries}

<?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}

/* End of file pi.kebab_case.php */
/* Location: /system/expressionengine/third_party/kebab_case/pi.kebab_case.php */
