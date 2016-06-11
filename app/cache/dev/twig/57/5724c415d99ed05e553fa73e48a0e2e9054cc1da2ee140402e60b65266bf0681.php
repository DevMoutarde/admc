<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_be773c6f057889949217a66ecfd4d216e8e7275fb7d6492aed6538ef83b9154a extends Twig_Template
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
        $__internal_6849a2a3f498ffbb914dd0a9ea39e0e5b03033b3657489480c972727a0a8dadc = $this->env->getExtension("native_profiler");
        $__internal_6849a2a3f498ffbb914dd0a9ea39e0e5b03033b3657489480c972727a0a8dadc->enter($__internal_6849a2a3f498ffbb914dd0a9ea39e0e5b03033b3657489480c972727a0a8dadc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6849a2a3f498ffbb914dd0a9ea39e0e5b03033b3657489480c972727a0a8dadc->leave($__internal_6849a2a3f498ffbb914dd0a9ea39e0e5b03033b3657489480c972727a0a8dadc_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_2d4f2f2fc92cc5c66fd4b89e76d933e76e9a83f6819ae8ab0f17e1211d7a01e9 = $this->env->getExtension("native_profiler");
        $__internal_2d4f2f2fc92cc5c66fd4b89e76d933e76e9a83f6819ae8ab0f17e1211d7a01e9->enter($__internal_2d4f2f2fc92cc5c66fd4b89e76d933e76e9a83f6819ae8ab0f17e1211d7a01e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_2d4f2f2fc92cc5c66fd4b89e76d933e76e9a83f6819ae8ab0f17e1211d7a01e9->leave($__internal_2d4f2f2fc92cc5c66fd4b89e76d933e76e9a83f6819ae8ab0f17e1211d7a01e9_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_ebf413b80c95267bf431892a0f251351d08ffbe617825ed3e836f29489e2d994 = $this->env->getExtension("native_profiler");
        $__internal_ebf413b80c95267bf431892a0f251351d08ffbe617825ed3e836f29489e2d994->enter($__internal_ebf413b80c95267bf431892a0f251351d08ffbe617825ed3e836f29489e2d994_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ebf413b80c95267bf431892a0f251351d08ffbe617825ed3e836f29489e2d994->leave($__internal_ebf413b80c95267bf431892a0f251351d08ffbe617825ed3e836f29489e2d994_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_a367f756673e76e219af360e0f8498360238689bbf4a3f46ed177d48f137e5d6 = $this->env->getExtension("native_profiler");
        $__internal_a367f756673e76e219af360e0f8498360238689bbf4a3f46ed177d48f137e5d6->enter($__internal_a367f756673e76e219af360e0f8498360238689bbf4a3f46ed177d48f137e5d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_a367f756673e76e219af360e0f8498360238689bbf4a3f46ed177d48f137e5d6->leave($__internal_a367f756673e76e219af360e0f8498360238689bbf4a3f46ed177d48f137e5d6_prof);

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
