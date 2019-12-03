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
  <div class=\"row\">
    <div id=\"content\" class=\"col-sm-12\">
      <div class=\"card-deck\">
      ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "rows", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 7
            echo "        <div class=\"card zoom\">
          <img src=\"http://";
            // line 8
            echo (isset($context["domain"]) ? $context["domain"] : null);
            echo "/product_image/";
            echo $this->getAttribute($context["row"], "image", array(), "array");
            echo "\" class=\"card-img-top\" alt=\"...\">
          <div class=\"card-img-overlay\">
            <h5 class=\"card-title\"><a href='/index.php?route=product/product&product_id= ";
            // line 10
            echo $this->getAttribute($context["row"], "product_id", array(), "array");
            echo "'> ";
            echo $this->getAttribute($context["row"], "name", array(), "array");
            echo " </a></h5>
          </div>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </div>
    </div>
  </div>
</div>
";
        // line 18
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
        return array (  59 => 18,  53 => 14,  41 => 10,  34 => 8,  31 => 7,  27 => 6,  19 => 1,);
    }
}
/* {{ header }}        */
/* <div id="common-home" class="container">*/
/*   <div class="row">*/
/*     <div id="content" class="col-sm-12">*/
/*       <div class="card-deck">*/
/*       {% for row in product.rows %}*/
/*         <div class="card zoom">*/
/*           <img src="http://{{domain}}/product_image/{{row['image']}}" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title"><a href='/index.php?route=product/product&product_id= {{ row['product_id'] }}'> {{row['name']}} </a></h5>*/
/*           </div>*/
/*         </div>*/
/*       {% endfor %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }}*/
