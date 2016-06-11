<?php

/* ADMCCoreBundle::layout.html.twig */
class __TwigTemplate_9032a55f06fc9f539cb3f7ff4090a2887198199f27fff05e919331110262dcab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("::layout.html.twig", "ADMCCoreBundle::layout.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ADMCCore_body' => array($this, 'block_ADMCCore_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4238b98df6ecc0bb7ebf3a4b332638bc38b1bc379fd4d9d791ec175383495a0e = $this->env->getExtension("native_profiler");
        $__internal_4238b98df6ecc0bb7ebf3a4b332638bc38b1bc379fd4d9d791ec175383495a0e->enter($__internal_4238b98df6ecc0bb7ebf3a4b332638bc38b1bc379fd4d9d791ec175383495a0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4238b98df6ecc0bb7ebf3a4b332638bc38b1bc379fd4d9d791ec175383495a0e->leave($__internal_4238b98df6ecc0bb7ebf3a4b332638bc38b1bc379fd4d9d791ec175383495a0e_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_b72a1f0655b7c169a31f1e1656655201d21ccc364591d167fa4c61861bc946ee = $this->env->getExtension("native_profiler");
        $__internal_b72a1f0655b7c169a31f1e1656655201d21ccc364591d167fa4c61861bc946ee->enter($__internal_b72a1f0655b7c169a31f1e1656655201d21ccc364591d167fa4c61861bc946ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 5
        echo "    
    Accueil - ";
        // line 6
        $this->displayParentBlock("title", $context, $blocks);
        echo "
    
";
        
        $__internal_b72a1f0655b7c169a31f1e1656655201d21ccc364591d167fa4c61861bc946ee->leave($__internal_b72a1f0655b7c169a31f1e1656655201d21ccc364591d167fa4c61861bc946ee_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_4210b6a95a6b5b2f9a4cc1432b8828136827a4edc35b329ae3a1122d2a6e07cf = $this->env->getExtension("native_profiler");
        $__internal_4210b6a95a6b5b2f9a4cc1432b8828136827a4edc35b329ae3a1122d2a6e07cf->enter($__internal_4210b6a95a6b5b2f9a4cc1432b8828136827a4edc35b329ae3a1122d2a6e07cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "    <h1>Accueil</h1>
    <hr>
    ";
        // line 13
        $this->displayBlock('ADMCCore_body', $context, $blocks);
        // line 15
        echo "    
";
        
        $__internal_4210b6a95a6b5b2f9a4cc1432b8828136827a4edc35b329ae3a1122d2a6e07cf->leave($__internal_4210b6a95a6b5b2f9a4cc1432b8828136827a4edc35b329ae3a1122d2a6e07cf_prof);

    }

    // line 13
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_70047de3f82e7762b710f88c64deacb74e5e4a8ff0197f98912e3ca71bc20280 = $this->env->getExtension("native_profiler");
        $__internal_70047de3f82e7762b710f88c64deacb74e5e4a8ff0197f98912e3ca71bc20280->enter($__internal_70047de3f82e7762b710f88c64deacb74e5e4a8ff0197f98912e3ca71bc20280_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 14
        echo "    ";
        
        $__internal_70047de3f82e7762b710f88c64deacb74e5e4a8ff0197f98912e3ca71bc20280->leave($__internal_70047de3f82e7762b710f88c64deacb74e5e4a8ff0197f98912e3ca71bc20280_prof);

    }

    public function getTemplateName()
    {
        return "ADMCCoreBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 14,  75 => 13,  67 => 15,  65 => 13,  61 => 11,  55 => 10,  45 => 6,  42 => 5,  36 => 4,  11 => 2,);
    }
}
/* */
/* {% extends "::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     */
/*     Accueil - {{ parent() }}*/
/*     */
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <h1>Accueil</h1>*/
/*     <hr>*/
/*     {% block ADMCCore_body %}*/
/*     {% endblock %}*/
/*     */
/* {% endblock %}*/
