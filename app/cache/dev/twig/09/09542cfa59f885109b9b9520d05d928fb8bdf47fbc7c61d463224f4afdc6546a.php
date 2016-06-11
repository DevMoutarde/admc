<?php

/* ADMCCoreBundle:Base:index.html.twig */
class __TwigTemplate_f87f82c72b273f2d90f0799e219e676e6be5ee4de7bac14d0ba0ef506cab8599 extends Twig_Template
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
        $__internal_c7adcb8c14b8d85d3db6b79117b48efc77593dda27502f262b67287d71494761 = $this->env->getExtension("native_profiler");
        $__internal_c7adcb8c14b8d85d3db6b79117b48efc77593dda27502f262b67287d71494761->enter($__internal_c7adcb8c14b8d85d3db6b79117b48efc77593dda27502f262b67287d71494761_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c7adcb8c14b8d85d3db6b79117b48efc77593dda27502f262b67287d71494761->leave($__internal_c7adcb8c14b8d85d3db6b79117b48efc77593dda27502f262b67287d71494761_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_59b540bd8c7017dd2ef45e19b66c93fc087fa3df92bb4552303b46615f164f07 = $this->env->getExtension("native_profiler");
        $__internal_59b540bd8c7017dd2ef45e19b66c93fc087fa3df92bb4552303b46615f164f07->enter($__internal_59b540bd8c7017dd2ef45e19b66c93fc087fa3df92bb4552303b46615f164f07_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_59b540bd8c7017dd2ef45e19b66c93fc087fa3df92bb4552303b46615f164f07->leave($__internal_59b540bd8c7017dd2ef45e19b66c93fc087fa3df92bb4552303b46615f164f07_prof);

    }

    // line 6
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_0849d43ee7b54503b0a773cd37d4652941ad53d38b9d55514c6946e2d51ea8af = $this->env->getExtension("native_profiler");
        $__internal_0849d43ee7b54503b0a773cd37d4652941ad53d38b9d55514c6946e2d51ea8af->enter($__internal_0849d43ee7b54503b0a773cd37d4652941ad53d38b9d55514c6946e2d51ea8af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 7
        echo "    
    <h2>Les news</h2>
    
    <ul>
         
            <li>news 1 </li>
            <li>news 2</li>
            <li>news 3</li>
     
    </ul>
    
";
        
        $__internal_0849d43ee7b54503b0a773cd37d4652941ad53d38b9d55514c6946e2d51ea8af->leave($__internal_0849d43ee7b54503b0a773cd37d4652941ad53d38b9d55514c6946e2d51ea8af_prof);

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
