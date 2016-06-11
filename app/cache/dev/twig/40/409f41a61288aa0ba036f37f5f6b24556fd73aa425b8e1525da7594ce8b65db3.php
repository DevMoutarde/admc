<?php

/* @Twig/Exception/traces.txt.twig */
class __TwigTemplate_1d680616b90068b2c8ae193d0a402d535d5e0576b939de900cee10b3fe20cf5d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_61a37099450e5fa5c5b0f6ff5d9fb5c6ad4a890c644cc0efc2d496a21553e025 = $this->env->getExtension("native_profiler");
        $__internal_61a37099450e5fa5c5b0f6ff5d9fb5c6ad4a890c644cc0efc2d496a21553e025->enter($__internal_61a37099450e5fa5c5b0f6ff5d9fb5c6ad4a890c644cc0efc2d496a21553e025_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("@Twig/Exception/trace.txt.twig", "@Twig/Exception/traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_61a37099450e5fa5c5b0f6ff5d9fb5c6ad4a890c644cc0efc2d496a21553e025->leave($__internal_61a37099450e5fa5c5b0f6ff5d9fb5c6ad4a890c644cc0efc2d496a21553e025_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
/* {% if exception.trace|length %}*/
/* {% for trace in exception.trace %}*/
/* {% include '@Twig/Exception/trace.txt.twig' with { 'trace': trace } only %}*/
/* */
/* {% endfor %}*/
/* {% endif %}*/
/* */
