<?php

/* ADMCCoreBundle::layout.html.twig */
class __TwigTemplate_7043e6cb1ebdf35f3f475799bd6cf50947019f9d30928cca0ace7a1678bf20f7 extends Twig_Template
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
        $__internal_d2dea962d1276651db93e9b318edd0499a9600bffcb873ce8c0f70fb3ea750c4 = $this->env->getExtension("native_profiler");
        $__internal_d2dea962d1276651db93e9b318edd0499a9600bffcb873ce8c0f70fb3ea750c4->enter($__internal_d2dea962d1276651db93e9b318edd0499a9600bffcb873ce8c0f70fb3ea750c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d2dea962d1276651db93e9b318edd0499a9600bffcb873ce8c0f70fb3ea750c4->leave($__internal_d2dea962d1276651db93e9b318edd0499a9600bffcb873ce8c0f70fb3ea750c4_prof);

    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $__internal_801e940c733ca226874b0ce15a11e738ae1d62542bb5e881a70ef0584375b98d = $this->env->getExtension("native_profiler");
        $__internal_801e940c733ca226874b0ce15a11e738ae1d62542bb5e881a70ef0584375b98d->enter($__internal_801e940c733ca226874b0ce15a11e738ae1d62542bb5e881a70ef0584375b98d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 5
        echo "    
    Accueil - ";
        // line 6
        $this->displayParentBlock("title", $context, $blocks);
        echo "
    
";
        
        $__internal_801e940c733ca226874b0ce15a11e738ae1d62542bb5e881a70ef0584375b98d->leave($__internal_801e940c733ca226874b0ce15a11e738ae1d62542bb5e881a70ef0584375b98d_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_f3b497c4cb631140a2ad672b5030cc53b4a1944bc8def371981298d801134524 = $this->env->getExtension("native_profiler");
        $__internal_f3b497c4cb631140a2ad672b5030cc53b4a1944bc8def371981298d801134524->enter($__internal_f3b497c4cb631140a2ad672b5030cc53b4a1944bc8def371981298d801134524_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 11
        echo "    <h1>Accueil</h1>
    <hr>
    ";
        // line 13
        $this->displayBlock('ADMCCore_body', $context, $blocks);
        // line 15
        echo "    
";
        
        $__internal_f3b497c4cb631140a2ad672b5030cc53b4a1944bc8def371981298d801134524->leave($__internal_f3b497c4cb631140a2ad672b5030cc53b4a1944bc8def371981298d801134524_prof);

    }

    // line 13
    public function block_ADMCCore_body($context, array $blocks = array())
    {
        $__internal_a706534ec0a019e4197ea6648c8d6510c517dde27b744b2e933ac362c39d5a05 = $this->env->getExtension("native_profiler");
        $__internal_a706534ec0a019e4197ea6648c8d6510c517dde27b744b2e933ac362c39d5a05->enter($__internal_a706534ec0a019e4197ea6648c8d6510c517dde27b744b2e933ac362c39d5a05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "ADMCCore_body"));

        // line 14
        echo "    ";
        
        $__internal_a706534ec0a019e4197ea6648c8d6510c517dde27b744b2e933ac362c39d5a05->leave($__internal_a706534ec0a019e4197ea6648c8d6510c517dde27b744b2e933ac362c39d5a05_prof);

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
