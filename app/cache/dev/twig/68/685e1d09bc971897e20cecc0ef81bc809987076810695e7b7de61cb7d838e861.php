<?php

/* ADMCCoreBundle:Base:index.html.twig */
class __TwigTemplate_9500d18a00dc7702a6bc8d6ea44147223087ec5a66028009397079459bd1c0cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("ADMCCoreBundle::layout.html.twig", "ADMCCoreBundle:Base:index.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'ADMCCore_body' => array($this, 'block_ADMCCore_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ADMCCoreBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a72f847ae9e3e13c0f05b75a7422a8d8f76d28841cfaff271ef7e5b4d7545994 = $this->env->getExtension("native_profiler");
        $__internal_a72f847ae9e3e13c0f05b75a7422a8d8f76d28841cfaff271ef7e5b4d7545994->enter($__internal_a72f847ae9e3e13c0f05b75a7422a8d8f76d28841cfaff271ef7e5b4d7545994_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a72f847ae9e3e13c0f05b75a7422a8d8f76d28841cfaff271ef7e5b4d7545994->leave($__internal_a72f847ae9e3e13c0f05b75a7422a8d8f76d28841cfaff271ef7e5b4d7545994_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_6f57ce5da39e5b5b15f734a30b712ab92f7cfd5fd5b331e6d8808255c26b9bb9 = $this->env->getExtension("native_profiler");
        $__internal_6f57ce5da39e5b5b15f734a30b712ab92f7cfd5fd5b331e6d8808255c26b9bb9->enter($__internal_6f57ce5da39e5b5b15f734a30b712ab92f7cfd5fd5b331e6d8808255c26b9bb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_6f57ce5da39e5b5b15f734a30b712ab92f7cfd5fd5b331e6d8808255c26b9bb9->leave($__internal_6f57ce5da39e5b5b15f734a30b712ab92f7cfd5fd5b331e6d8808255c26b9bb9_prof);

    }

    // line 6
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_6c15df0383a86a1cbb7d3d8e276b41c70f9eaf03a363adb76f6a15af88da9409 = $this->env->getExtension("native_profiler");
        $__internal_6c15df0383a86a1cbb7d3d8e276b41c70f9eaf03a363adb76f6a15af88da9409->enter($__internal_6c15df0383a86a1cbb7d3d8e276b41c70f9eaf03a363adb76f6a15af88da9409_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 7
        echo "    
    <h2>Les news</h2>
    
    <ul>
         
            <li>news 1 </li>
            <li>news 2</li>
            <li>news 3</li>
     
    </ul>
    
";
        
        $__internal_6c15df0383a86a1cbb7d3d8e276b41c70f9eaf03a363adb76f6a15af88da9409->leave($__internal_6c15df0383a86a1cbb7d3d8e276b41c70f9eaf03a363adb76f6a15af88da9409_prof);

    }

    public function getTemplateName()
    {
        return "ADMCCoreBundle:Base:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 7,  48 => 6,  35 => 4,  11 => 2,);
    }
}
/* {# empty Twig template #}*/
/* {% extends "ADMCCoreBundle::layout.html.twig" %}*/
/* */
/* {% block title %} Accueil - {{parent()}}{% endblock %}*/
/* */
/* {% block ADMCCore_body %}*/
/*     */
/*     <h2>Les news</h2>*/
/*     */
/*     <ul>*/
/*          */
/*             <li>news 1 </li>*/
/*             <li>news 2</li>*/
/*             <li>news 3</li>*/
/*      */
/*     </ul>*/
/*     */
/* {% endblock %}*/
