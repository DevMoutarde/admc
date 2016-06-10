<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_8f2f932f8156603ebbe7d59f3ef5b802dbf70787680195917b4e5ab45353027e extends Twig_Template
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
        $__internal_2f66c9d32219fec09d27749788a2fcce3f4f62d259cc88c70b4b14b4763e001e = $this->env->getExtension("native_profiler");
        $__internal_2f66c9d32219fec09d27749788a2fcce3f4f62d259cc88c70b4b14b4763e001e->enter($__internal_2f66c9d32219fec09d27749788a2fcce3f4f62d259cc88c70b4b14b4763e001e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2f66c9d32219fec09d27749788a2fcce3f4f62d259cc88c70b4b14b4763e001e->leave($__internal_2f66c9d32219fec09d27749788a2fcce3f4f62d259cc88c70b4b14b4763e001e_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_f32246108b92bf7882bc442ea8a489f5e96eb34fde48d8f74a76befde4833ba9 = $this->env->getExtension("native_profiler");
        $__internal_f32246108b92bf7882bc442ea8a489f5e96eb34fde48d8f74a76befde4833ba9->enter($__internal_f32246108b92bf7882bc442ea8a489f5e96eb34fde48d8f74a76befde4833ba9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_f32246108b92bf7882bc442ea8a489f5e96eb34fde48d8f74a76befde4833ba9->leave($__internal_f32246108b92bf7882bc442ea8a489f5e96eb34fde48d8f74a76befde4833ba9_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_56ad4e684b618af00ab8e493dcb8e041791447e1f91572b65c1da795abcc7ba3 = $this->env->getExtension("native_profiler");
        $__internal_56ad4e684b618af00ab8e493dcb8e041791447e1f91572b65c1da795abcc7ba3->enter($__internal_56ad4e684b618af00ab8e493dcb8e041791447e1f91572b65c1da795abcc7ba3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_56ad4e684b618af00ab8e493dcb8e041791447e1f91572b65c1da795abcc7ba3->leave($__internal_56ad4e684b618af00ab8e493dcb8e041791447e1f91572b65c1da795abcc7ba3_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_25b4bd7d0b913c1c37de9a2c604638467bc280963d79f2e7751537015faec5e3 = $this->env->getExtension("native_profiler");
        $__internal_25b4bd7d0b913c1c37de9a2c604638467bc280963d79f2e7751537015faec5e3->enter($__internal_25b4bd7d0b913c1c37de9a2c604638467bc280963d79f2e7751537015faec5e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_25b4bd7d0b913c1c37de9a2c604638467bc280963d79f2e7751537015faec5e3->leave($__internal_25b4bd7d0b913c1c37de9a2c604638467bc280963d79f2e7751537015faec5e3_prof);

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
