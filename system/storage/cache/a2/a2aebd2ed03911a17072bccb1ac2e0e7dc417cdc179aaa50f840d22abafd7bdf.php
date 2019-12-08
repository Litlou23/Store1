<?php

/* default/template/common/home.twig */
class __TwigTemplate_bd9358df0568406daca5761ace832359dbc24ea4ee30708c81e3cf7a8a72c0d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div id=\"common-home\" class=\"container\">
<<<<<<< Updated upstream
  <div class=\"row\">";
        // line 3
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 4
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 5
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 6
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 7
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 8
            echo "    ";
        } else {
            // line 9
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 10
            echo "    ";
        }
        // line 11
        echo "    <!--To do enable products to be shown when you get a chance -->
    <div id=\"content\" class=\"";
        // line 12
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 13
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 15
=======
  <div class=\"row\">
    <div id=\"content\" class=\"col-sm-12\">
      <div class=\"card-deck\">
      ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 7
            echo "        ";
            if ($this->getAttribute($context["category"], "children", array())) {
                // line 8
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 9
                    echo "            <div class=\"card zoom\">
              <img src=\"http://";
                    // line 10
                    echo (isset($context["domain"]) ? $context["domain"] : null);
                    echo "/product_image/";
                    echo $this->getAttribute($context["child"], "image", array(), "array");
                    echo "\" class=\"card-img-top\" alt=\"...\">
              <div class=\"card-img-overlay\">
                <h5 class=\"card-title\"><a href='";
                    // line 12
                    echo $this->getAttribute($context["child"], "href", array());
                    echo "'> ";
                    echo $this->getAttribute($context["child"], "name", array(), "array");
                    echo " </a></h5>
              </div>
            </div>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                echo "        ";
            }
            // line 17
            echo "        <div class=\"card zoom\">
          <img src=\"http://";
            // line 18
            echo (isset($context["domain"]) ? $context["domain"] : null);
            echo "/product_image/";
            echo $this->getAttribute($context["category"], "image", array(), "array");
            echo "\" class=\"card-img-top\" alt=\"...\">
          <div class=\"card-img-overlay\">
            <h5 class=\"card-title\"><a href='";
            // line 20
            echo $this->getAttribute($context["category"], "href", array());
            echo "'> ";
            echo $this->getAttribute($context["category"], "name", array(), "array");
            echo " </a></h5>
          </div>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "      </div>
    </div>
  </div>
</div>
";
        // line 28
>>>>>>> Stashed changes
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "default/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
<<<<<<< Updated upstream
        return array (  63 => 15,  58 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  28 => 4,  24 => 3,  19 => 1,);
=======
        return array (  92 => 28,  86 => 24,  74 => 20,  67 => 18,  64 => 17,  61 => 16,  49 => 12,  42 => 10,  39 => 9,  34 => 8,  31 => 7,  27 => 6,  19 => 1,);
>>>>>>> Stashed changes
    }
}
/* {{ header }}*/
/* <div id="common-home" class="container">*/
<<<<<<< Updated upstream
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <!--To do enable products to be shown when you get a chance -->*/
/*     <div id="content" class="{{ class }}">{{ content_top }}{{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
=======
/*   <div class="row">*/
/*     <div id="content" class="col-sm-12">*/
/*       <div class="card-deck">*/
/*       {% for category in categories %}*/
/*         {% if category.children %}*/
/*           {% for child in category.children %}*/
/*             <div class="card zoom">*/
/*               <img src="http://{{domain}}/product_image/{{child['image']}}" class="card-img-top" alt="...">*/
/*               <div class="card-img-overlay">*/
/*                 <h5 class="card-title"><a href='{{ child.href }}'> {{child['name']}} </a></h5>*/
/*               </div>*/
/*             </div>*/
/*           {% endfor %}*/
/*         {% endif %}*/
/*         <div class="card zoom">*/
/*           <img src="http://{{domain}}/product_image/{{category['image']}}" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title"><a href='{{ category.href }}'> {{category['name']}} </a></h5>*/
/*           </div>*/
/*         </div>*/
/*       {% endfor %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
>>>>>>> Stashed changes
/* </div>*/
/* {{ footer }}*/
