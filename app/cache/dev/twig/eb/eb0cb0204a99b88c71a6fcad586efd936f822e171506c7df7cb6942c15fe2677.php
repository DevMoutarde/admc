<?php

/* ADMCCoreBundle:Base:menu.html.twig */
class __TwigTemplate_509e786a188dec069f37a40a0bfc6182f2288d8e35607cf6f52ad23935cc8378 extends Twig_Template
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
        $__internal_4c8570a40ef852da4539156d3c387563eb55a550378bc96afea9f986d6c89718 = $this->env->getExtension("native_profiler");
        $__internal_4c8570a40ef852da4539156d3c387563eb55a550378bc96afea9f986d6c89718->enter($__internal_4c8570a40ef852da4539156d3c387563eb55a550378bc96afea9f986d6c89718_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:menu.html.twig"));

        // line 1
        echo "

";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listMenu"]) ? $context["listMenu"] : $this->getContext($context, "listMenu")));
        foreach ($context['_seq'] as $context["_key"] => $context["list"]) {
            // line 4
            echo "    <ul>
        <li>list.name</li>
    </ul>
    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_4c8570a40ef852da4539156d3c387563eb55a550378bc96afea9f986d6c89718->leave($__internal_4c8570a40ef852da4539156d3c387563eb55a550378bc96afea9f986d6c89718_prof);

    }

    public function getTemplateName()
    {
        return "ADMCCoreBundle:Base:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  26 => 3,  22 => 1,);
    }
}
/* */
/* */
/* {% for list in listMenu %}*/
/*     <ul>*/
/*         <li>list.name</li>*/
/*     </ul>*/
/*     */
/* {% endfor %}*/
/* */
