<?php

/* ADMCCoreBundle:Base:menu.html.twig */
class __TwigTemplate_f8c852e3e89196382ad641eb283b2f0428ac6fd1032b0194dbfd423d12ec699e extends Twig_Template
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
        $__internal_8bf2a4b221c64bd35cb3aee10018d773d06190fda346fee67b909c45e4fb18cc = $this->env->getExtension("native_profiler");
        $__internal_8bf2a4b221c64bd35cb3aee10018d773d06190fda346fee67b909c45e4fb18cc->enter($__internal_8bf2a4b221c64bd35cb3aee10018d773d06190fda346fee67b909c45e4fb18cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "ADMCCoreBundle:Base:menu.html.twig"));

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
        
        $__internal_8bf2a4b221c64bd35cb3aee10018d773d06190fda346fee67b909c45e4fb18cc->leave($__internal_8bf2a4b221c64bd35cb3aee10018d773d06190fda346fee67b909c45e4fb18cc_prof);

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
