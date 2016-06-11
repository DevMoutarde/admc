<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_12f70e0655521847b3c09e91b9f1dc086262ffc606abbcb670b91ad7b1c54482 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cf80456924242c75cbbdfcec383007da5b2ea7d498540fbce1d78ae28d19f87b = $this->env->getExtension("native_profiler");
        $__internal_cf80456924242c75cbbdfcec383007da5b2ea7d498540fbce1d78ae28d19f87b->enter($__internal_cf80456924242c75cbbdfcec383007da5b2ea7d498540fbce1d78ae28d19f87b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cf80456924242c75cbbdfcec383007da5b2ea7d498540fbce1d78ae28d19f87b->leave($__internal_cf80456924242c75cbbdfcec383007da5b2ea7d498540fbce1d78ae28d19f87b_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_06bd6ea8010cf170b9732b929d386563d17ceaea823e53862aa25472fa856707 = $this->env->getExtension("native_profiler");
        $__internal_06bd6ea8010cf170b9732b929d386563d17ceaea823e53862aa25472fa856707->enter($__internal_06bd6ea8010cf170b9732b929d386563d17ceaea823e53862aa25472fa856707_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_06bd6ea8010cf170b9732b929d386563d17ceaea823e53862aa25472fa856707->leave($__internal_06bd6ea8010cf170b9732b929d386563d17ceaea823e53862aa25472fa856707_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_9abd49325f5b7ca97fe330c81f0264a689c89fac3bd5e65d1312dec7efb01c0c = $this->env->getExtension("native_profiler");
        $__internal_9abd49325f5b7ca97fe330c81f0264a689c89fac3bd5e65d1312dec7efb01c0c->enter($__internal_9abd49325f5b7ca97fe330c81f0264a689c89fac3bd5e65d1312dec7efb01c0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_9abd49325f5b7ca97fe330c81f0264a689c89fac3bd5e65d1312dec7efb01c0c->leave($__internal_9abd49325f5b7ca97fe330c81f0264a689c89fac3bd5e65d1312dec7efb01c0c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_5093f829047f44a45873feb971cca3143165bffb0eb4e714dce63be4c15970a0 = $this->env->getExtension("native_profiler");
        $__internal_5093f829047f44a45873feb971cca3143165bffb0eb4e714dce63be4c15970a0->enter($__internal_5093f829047f44a45873feb971cca3143165bffb0eb4e714dce63be4c15970a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_5093f829047f44a45873feb971cca3143165bffb0eb4e714dce63be4c15970a0->leave($__internal_5093f829047f44a45873feb971cca3143165bffb0eb4e714dce63be4c15970a0_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
