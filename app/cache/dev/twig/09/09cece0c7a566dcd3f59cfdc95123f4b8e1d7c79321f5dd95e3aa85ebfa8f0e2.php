<?php

/* ADMCCoreBundle:Base:menu.html.twig */
class __TwigTemplate_1b01fe2bd81186540a9dd6157a8dc48f33607ebeb283448fd1c12b66310abf66 extends Twig_Template
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
        $__internal_43814f5aa9ca134b30099d35b4121608b49a5d3a30a93875d20fc17520db953c = $this->env->getExtension("native_profiler");
        $__internal_43814f5aa9ca134b30099d35b4121608b49a5d3a30a93875d20fc17520db953c->enter($__internal_43814f5aa9ca134b30099d35b4121608b49a5d3a30a93875d20fc17520db953c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:menu.html.twig"));

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
        
        $__internal_43814f5aa9ca134b30099d35b4121608b49a5d3a30a93875d20fc17520db953c->leave($__internal_43814f5aa9ca134b30099d35b4121608b49a5d3a30a93875d20fc17520db953c_prof);

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
