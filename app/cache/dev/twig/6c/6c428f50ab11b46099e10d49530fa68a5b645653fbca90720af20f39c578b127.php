<?php

/* ADMCCoreBundle:Base:index.html.twig */
class __TwigTemplate_944d21d13cd93567603b5be6cee0447000e06ca7a8b1d5f7e26a40706658c1d9 extends Twig_Template
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
        $__internal_5fcd0c38ad3cc3fb6e88809d5d1bacdfdd6ac123ccdea3dca7c817dba5e49720 = $this->env->getExtension("native_profiler");
        $__internal_5fcd0c38ad3cc3fb6e88809d5d1bacdfdd6ac123ccdea3dca7c817dba5e49720->enter($__internal_5fcd0c38ad3cc3fb6e88809d5d1bacdfdd6ac123ccdea3dca7c817dba5e49720_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5fcd0c38ad3cc3fb6e88809d5d1bacdfdd6ac123ccdea3dca7c817dba5e49720->leave($__internal_5fcd0c38ad3cc3fb6e88809d5d1bacdfdd6ac123ccdea3dca7c817dba5e49720_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_071610acdd25f5ff98fa8427d2be6684fd56aa440a374e7dc56b61fbcb00edcb = $this->env->getExtension("native_profiler");
        $__internal_071610acdd25f5ff98fa8427d2be6684fd56aa440a374e7dc56b61fbcb00edcb->enter($__internal_071610acdd25f5ff98fa8427d2be6684fd56aa440a374e7dc56b61fbcb00edcb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_071610acdd25f5ff98fa8427d2be6684fd56aa440a374e7dc56b61fbcb00edcb->leave($__internal_071610acdd25f5ff98fa8427d2be6684fd56aa440a374e7dc56b61fbcb00edcb_prof);

    }

    // line 6
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_41666701a99b1ec92c2b5404600f6234d7dff756a81a168b86bbf6c801d3cde5 = $this->env->getExtension("native_profiler");
        $__internal_41666701a99b1ec92c2b5404600f6234d7dff756a81a168b86bbf6c801d3cde5->enter($__internal_41666701a99b1ec92c2b5404600f6234d7dff756a81a168b86bbf6c801d3cde5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 7
        echo "    
    <h2>Les news</h2>
    
    <ul>
         
            <li>news 1 </li>
            <li>news 2</li>
            <li>news 3</li>
     
    </ul>
    
";
        
        $__internal_41666701a99b1ec92c2b5404600f6234d7dff756a81a168b86bbf6c801d3cde5->leave($__internal_41666701a99b1ec92c2b5404600f6234d7dff756a81a168b86bbf6c801d3cde5_prof);

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
