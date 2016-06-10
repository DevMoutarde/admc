<?php

/* ADMCCoreBundle::layout.html.twig */
class __TwigTemplate_abdf12e6c4073fc2be078ee9726821462fcd8c1c0fc24532f3e648ca683c2775 extends Twig_Template
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
        $__internal_31c33756b6112a8a7de9927fb92847187dbfa115e3f736e129b09fdb794d3596 = $this->env->getExtension("native_profiler");
        $__internal_31c33756b6112a8a7de9927fb92847187dbfa115e3f736e129b09fdb794d3596->enter($__internal_31c33756b6112a8a7de9927fb92847187dbfa115e3f736e129b09fdb794d3596_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_31c33756b6112a8a7de9927fb92847187dbfa115e3f736e129b09fdb794d3596->leave($__internal_31c33756b6112a8a7de9927fb92847187dbfa115e3f736e129b09fdb794d3596_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_224fd3dee6ecef5f6959463364a58c38ed0d8d984af337a1f37a91c1645794b3 = $this->env->getExtension("native_profiler");
        $__internal_224fd3dee6ecef5f6959463364a58c38ed0d8d984af337a1f37a91c1645794b3->enter($__internal_224fd3dee6ecef5f6959463364a58c38ed0d8d984af337a1f37a91c1645794b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 5
        echo "    
    Accueil - ";
        // line 6
        $this->displayParentBlock("title", $context, $blocks);
        echo "
    
";
        
        $__internal_224fd3dee6ecef5f6959463364a58c38ed0d8d984af337a1f37a91c1645794b3->leave($__internal_224fd3dee6ecef5f6959463364a58c38ed0d8d984af337a1f37a91c1645794b3_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_a1a2f481c6ca2a5dff8bea3b1cd84e15301b6b15b8c65d5fa93971db53c398c4 = $this->env->getExtension("native_profiler");
        $__internal_a1a2f481c6ca2a5dff8bea3b1cd84e15301b6b15b8c65d5fa93971db53c398c4->enter($__internal_a1a2f481c6ca2a5dff8bea3b1cd84e15301b6b15b8c65d5fa93971db53c398c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "    <h1>Accueil</h1>
    <hr>
    ";
        // line 13
        $this->displayBlock('ADMCCore_body', $context, $blocks);
        // line 15
        echo "    
";
        
        $__internal_a1a2f481c6ca2a5dff8bea3b1cd84e15301b6b15b8c65d5fa93971db53c398c4->leave($__internal_a1a2f481c6ca2a5dff8bea3b1cd84e15301b6b15b8c65d5fa93971db53c398c4_prof);

    }

    // line 13
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_d8965e97598dc8d5fef3409daebfc7097c6fe6fd5db32d0aedae9de09935adae = $this->env->getExtension("native_profiler");
        $__internal_d8965e97598dc8d5fef3409daebfc7097c6fe6fd5db32d0aedae9de09935adae->enter($__internal_d8965e97598dc8d5fef3409daebfc7097c6fe6fd5db32d0aedae9de09935adae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 14
        echo "    ";
        
        $__internal_d8965e97598dc8d5fef3409daebfc7097c6fe6fd5db32d0aedae9de09935adae->leave($__internal_d8965e97598dc8d5fef3409daebfc7097c6fe6fd5db32d0aedae9de09935adae_prof);

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
