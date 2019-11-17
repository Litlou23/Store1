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

    <!--To do enable products to be shown when you get a chance -->
    <div id=\"content\" class=\"col-sm-12\">
      <img src=\"/product_image/no_image.png\" alt=\"...\" class=\"simg-thumbnail\">
      <img src=\"/product_image/no_image.png\" alt=\"...\" class=\"simg-thumbnail\">
    </div>
</div>
";
        // line 11
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
        return array (  32 => 11,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="common-home" class="container">*/
/*   <div class="row">*/
/* */
/*     <!--To do enable products to be shown when you get a chance -->*/
/*     <div id="content" class="col-sm-12">*/
/*       <img src="/product_image/no_image.png" alt="..." class="simg-thumbnail">*/
/*       <img src="/product_image/no_image.png" alt="..." class="simg-thumbnail">*/
/*     </div>*/
/* </div>*/
/* {{ footer }}*/
