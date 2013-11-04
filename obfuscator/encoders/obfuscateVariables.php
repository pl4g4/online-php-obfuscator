 <?php
/**
 * Encryption class
 *
 * @package Encryption
 * @author Ewg
 * @category Security
 * @todo Multi file
 */
class Encryption
{
    /**
     * File content
     * @var String
     */
    public $content;

    /**
     * File content not changed
     * @var String
     */
    public $content_source;

    /**
     * All varibles
     * @var Array|String
     */
    public $vars = array ();

    /**
     * Chains of varibles
     * @example "class name" <=> "352=>array (370, 307)"
     * @var Array
     */
    private $chains = array (
    352=>array (370, 307), // class
    347=> array (370, 309), // var
    341=>array (370, 309), // public
    343=>array (370, 309), // private
    342=>array (370, 309), // protected
    299=>array (370, 307) // new
    );

    /**
     * Forbidden for replace strings
     * @var Array
     */
    private $forbidden = array ('Exception', '$this');

    /**
     * a..z
     * @var Array
     */
    public $abc = array ();

    /**
     * Address of source file
     * @var String
     */
    public $file_source;

    /**
     * Class activation
     */
    public function __construct ()
    {
        if (empty ($this->abc))
        {
            $this->abc = range (a, z);
        }
    }

    /**
     * Parse activation
     * @param String $file_source
     * @return Object $this
     */
    public function parse ($file_source)
    {
        $this->content_source = file_get_contents($this->file_source = $file_source);
        $this->content = token_get_all ($this->content_source);
        foreach ($this->content as $key=>$value)
        {
            if(is_array ($value))
            {
                $this->content[$key]['2'] = token_name($value['0']);
                if (isset ($chain))
                {
                    if (is_array ($chain))
                    {
                        if ($this->chains[$chainid][$i]===$chain['0'])
                        {
                            $i++;
                            $chain = array ($this->chains[$chainid][$i]);
                        }
                        else
                        {
                            unset ($chain);
                        }
                    }
                    else
                    {
                        $chainid = $chain;
                        $i = 0;
                        $end = end ($this->chains[$chainid]);
                        $chain = array (reset ($this->chains[$chain]));
                    }

                    if ($end===$chain['0'])
                    {
                        if ($value['0']===$chain['0'])
                        {
                            $this->add ($value['1'], $value['0']);
                        }
                        unset ($chain);
                    }
                }
                else
                {
                    if (array_key_exists ($value['0'], $this->chains))
                    {
                        $chain = $value['0'];
                    }
                    else
                    {
                        if ($value['0']===309)
                        {
                            $this->add ($value['1'], 309);
                        }
                    }
                }
            }
        }
        return $this;
    }

    /**
     * Add varible to action
     * @param String $id
     * @param Int $type
     */
    public function add ($id, $type = false)
    {
        if (!in_array ($id, $this->vars) and !(in_array ($id, $this->forbidden)))
        {
            if ($type===307)
            {
                $type = false;
            }
            $this->vars[] = array ($id, $type);
        }
    }

    /**
     * Main action - code
     * @param String $file
     * @return Json vars
     */
    public function codeit ($file)
    {
        foreach ($this->vars as $key=>$value)
        {
            $temp[$value['0']] = ($value['1']? '$': '').$this->gen_name ();
        }
        $this->content_source = strtr ($this->content_source, $temp);
        file_put_contents($file, $this->content_source);
        return $this->vars = json_encode(array ($this->file_source=>$temp));
    }

    /**
     * Generate unique name
     * @return String
     */
    private function gen_name ()
    {
        return $this->abc[rand (0, 25)].$this->abc[rand (0, 25)].str_repeat('_', rand (2, 15)).$this->abc[rand (0, 25)];
    }
} 

?>