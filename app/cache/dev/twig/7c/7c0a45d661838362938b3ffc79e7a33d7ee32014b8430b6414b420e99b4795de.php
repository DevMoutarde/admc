<?php

/* base.html.twig */
class __TwigTemplate_7d034933cb2cb69474730b2420014e91ee970919878ade46466f576196e35be7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4c1408220d82a2898e9f74b7f8f59442171d0f3e0c233faf3e8d0ca1b2f2f476 = $this->env->getExtension("native_profiler");
        $__internal_4c1408220d82a2898e9f74b7f8f59442171d0f3e0c233faf3e8d0ca1b2f2f476->enter($__internal_4c1408220d82a2898e9f74b7f8f59442171d0f3e0c233faf3e8d0ca1b2f2f476_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_4c1408220d82a2898e9f74b7f8f59442171d0f3e0c233faf3e8d0ca1b2f2f476->leave($__internal_4c1408220d82a2898e9f74b7f8f59442171d0f3e0c233faf3e8d0ca1b2f2f476_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_679fbdd4d3b3957ca5e514d7eb5fdb978f728d002a96a213fffece28d9b7b739 = $this->env->getExtension("native_profiler");
        $__internal_679fbdd4d3b3957ca5e514d7eb5fdb978f728d002a96a213fffece28d9b7b739->enter($__internal_679fbdd4d3b3957ca5e514d7eb5fdb978f728d002a96a213fffece28d9b7b739_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_679fbdd4d3b3957ca5e514d7eb5fdb978f728d002a96a213fffece28d9b7b739->leave($__internal_679fbdd4d3b3957ca5e514d7eb5fdb978f728d002a96a213fffece28d9b7b739_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_38ec038f085548647c9f91f022fc6c5dc221a5882e151e7e4d1a1565d3551acf = $this->env->getExtension("native_profiler");
        $__internal_38ec038f085548647c9f91f022fc6c5dc221a5882e151e7e4d1a1565d3551acf->enter($__internal_38ec038f085548647c9f91f022fc6c5dc221a5882e151e7e4d1a1565d3551acf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_38ec038f085548647c9f91f022fc6c5dc221a5882e151e7e4d1a1565d3551acf->leave($__internal_38ec038f085548647c9f91f022fc6c5dc221a5882e151e7e4d1a1565d3551acf_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_ad55053c566b6ae74b31b2685eb8ccc59f16a993afe5d2d2cfc019467e938e10 = $this->env->getExtension("native_profiler");
        $__internal_ad55053c566b6ae74b31b2685eb8ccc59f16a993afe5d2d2cfc019467e938e10->enter($__internal_ad55053c566b6ae74b31b2685eb8ccc59f16a993afe5d2d2cfc019467e938e10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_ad55053c566b6ae74b31b2685eb8ccc59f16a993afe5d2d2cfc019467e938e10->leave($__internal_ad55053c566b6ae74b31b2685eb8ccc59f16a993afe5d2d2cfc019467e938e10_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_eeb252edca2c197b9fa69c6667e8bf1a256090ed6872fe6715e925549f334288 = $this->env->getExtension("native_profiler");
        $__internal_eeb252edca2c197b9fa69c6667e8bf1a256090ed6872fe6715e925549f334288->enter($__internal_eeb252edca2c197b9fa69c6667e8bf1a256090ed6872fe6715e925549f334288_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_eeb252edca2c197b9fa69c6667e8bf1a256090ed6872fe6715e925549f334288->leave($__internal_eeb252edca2c197b9fa69c6667e8bf1a256090ed6872fe6715e925549f334288_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
