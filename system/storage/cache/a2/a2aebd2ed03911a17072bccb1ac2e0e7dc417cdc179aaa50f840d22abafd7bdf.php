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
        $cardsHtml = '';

        foreach($context['product']->rows as &$row){
          $cardsHtml = $cardsHtml . "<div class=\"card\">
          <img src=\"http://" . $_SERVER['HTTP_HOST'] . "/product_image/" . $row['image'] . "\" class=\"card-img-top\" alt=\"...\">
          <div class=\"card-img-overlay\">
            <h5 class=\"card-title\"><a href='/index.php?route=product/product&product_id=" . $row['product_id'] . "'>" . $row['name'] . "</a></h5>
          </div>
        </div>";
        }

        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div id=\"common-home\" class=\"container\">
  <div class=\"row\">
    <div id=\"content\" class=\"col-sm-12\">
      <div class=\"card-deck\">
" . $cardsHtml . "
      </div>
    </div>
  </div>
</div>
";
        // line 40
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
        return array (  61 => 40,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="common-home" class="container">*/
/*   <div class="row">*/
/*     <div id="content" class="col-sm-12">*/
/*       <div class="card-deck">*/
/*         <div class="card">*/
/*           <img src="/product_image/profile.png" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title">Place Holder</h5>*/
/*           </div>*/
/*         </div>*/
/*         <div class="card">*/
/*           <img src="/product_image/profile.png" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title">Place Holder</h5>*/
/*           </div>*/
/*         </div>*/
/*         <div class="card">*/
/*           <img src="/product_image/profile.png" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title">Place Holder</h5>*/
/*           </div>*/
/*         </div>*/
/*         <div class="card">*/
/*           <img src="/product_image/profile.png" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title">Place Holder</h5>*/
/*           </div>*/
/*         </div>*/
/*         <div class="card">*/
/*           <img src="/product_image/profile.png" class="card-img-top" alt="...">*/
/*           <div class="card-img-overlay">*/
/*             <h5 class="card-title">Place Holder</h5>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }}*/
