<?php

/* ADMCDSIBundle:Dsi:menu.html.twig */
class __TwigTemplate_8003c2a6032a3dcd788e3d87548ab58833235e83fdd01d69a08c46741b152a56 extends Twig_Template
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
        $__internal_2b5900dfe17807142dc934be9ddc1750675a881e12c2debdb47bca3bf753b730 = $this->env->getExtension("native_profiler");
        $__internal_2b5900dfe17807142dc934be9ddc1750675a881e12c2debdb47bca3bf753b730->enter($__internal_2b5900dfe17807142dc934be9ddc1750675a881e12c2debdb47bca3bf753b730_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCDSIBundle:Dsi:menu.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 2
            echo "    <ul>
        <li>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</li>
    </ul>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_2b5900dfe17807142dc934be9ddc1750675a881e12c2debdb47bca3bf753b730->leave($__internal_2b5900dfe17807142dc934be9ddc1750675a881e12c2debdb47bca3bf753b730_prof);

    }

    public function getTemplateName()
    {
        return "ADMCDSIBundle:Dsi:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,  22 => 1,);
    }
}
/* {% for item in menu %}*/
/*     <ul>*/
/*         <li>{{ item.name  }}</li>*/
/*     </ul>*/
/* {% endfor %}*/
