<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_0edd1446d898a7349be7fd39512cda4cb5f1b173114faefe499a9408c8425ef9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a2a9474bd362a7accc1149a442566dc9f9e7de66b59bbab546fddc8379560033 = $this->env->getExtension("native_profiler");
        $__internal_a2a9474bd362a7accc1149a442566dc9f9e7de66b59bbab546fddc8379560033->enter($__internal_a2a9474bd362a7accc1149a442566dc9f9e7de66b59bbab546fddc8379560033_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a2a9474bd362a7accc1149a442566dc9f9e7de66b59bbab546fddc8379560033->leave($__internal_a2a9474bd362a7accc1149a442566dc9f9e7de66b59bbab546fddc8379560033_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_235b05ab20a45c60400e4514dc4753f00317f1f7b9071dd318d6a94ec5f61cfb = $this->env->getExtension("native_profiler");
        $__internal_235b05ab20a45c60400e4514dc4753f00317f1f7b9071dd318d6a94ec5f61cfb->enter($__internal_235b05ab20a45c60400e4514dc4753f00317f1f7b9071dd318d6a94ec5f61cfb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_235b05ab20a45c60400e4514dc4753f00317f1f7b9071dd318d6a94ec5f61cfb->leave($__internal_235b05ab20a45c60400e4514dc4753f00317f1f7b9071dd318d6a94ec5f61cfb_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_245f1946d7694d142ee8cdd2dffc6628d9c2525a524d756185536e9274fc0986 = $this->env->getExtension("native_profiler");
        $__internal_245f1946d7694d142ee8cdd2dffc6628d9c2525a524d756185536e9274fc0986->enter($__internal_245f1946d7694d142ee8cdd2dffc6628d9c2525a524d756185536e9274fc0986_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_245f1946d7694d142ee8cdd2dffc6628d9c2525a524d756185536e9274fc0986->leave($__internal_245f1946d7694d142ee8cdd2dffc6628d9c2525a524d756185536e9274fc0986_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_861c617827b789eb48159408d058298d2843319743d881ecab08381aba12972e = $this->env->getExtension("native_profiler");
        $__internal_861c617827b789eb48159408d058298d2843319743d881ecab08381aba12972e->enter($__internal_861c617827b789eb48159408d058298d2843319743d881ecab08381aba12972e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_861c617827b789eb48159408d058298d2843319743d881ecab08381aba12972e->leave($__internal_861c617827b789eb48159408d058298d2843319743d881ecab08381aba12972e_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
