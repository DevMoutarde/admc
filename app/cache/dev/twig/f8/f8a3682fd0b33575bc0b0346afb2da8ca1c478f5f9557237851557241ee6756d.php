<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_98dfe37b40fe6070d0b69a7eb92fef554f7967d97800537b7eef4acf8a253575 extends Twig_Template
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
        $__internal_c96fd709594e1b7193b55310f9986aab32c080dabc118f4523f676fa72e2ddd3 = $this->env->getExtension("native_profiler");
        $__internal_c96fd709594e1b7193b55310f9986aab32c080dabc118f4523f676fa72e2ddd3->enter($__internal_c96fd709594e1b7193b55310f9986aab32c080dabc118f4523f676fa72e2ddd3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c96fd709594e1b7193b55310f9986aab32c080dabc118f4523f676fa72e2ddd3->leave($__internal_c96fd709594e1b7193b55310f9986aab32c080dabc118f4523f676fa72e2ddd3_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_73ce1257b20fac18747d7d96ae7ac1cfbfd1a91fa9c4837c727d74f7a7bf33a7 = $this->env->getExtension("native_profiler");
        $__internal_73ce1257b20fac18747d7d96ae7ac1cfbfd1a91fa9c4837c727d74f7a7bf33a7->enter($__internal_73ce1257b20fac18747d7d96ae7ac1cfbfd1a91fa9c4837c727d74f7a7bf33a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_73ce1257b20fac18747d7d96ae7ac1cfbfd1a91fa9c4837c727d74f7a7bf33a7->leave($__internal_73ce1257b20fac18747d7d96ae7ac1cfbfd1a91fa9c4837c727d74f7a7bf33a7_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_e570cb89785495f3dedc7ba5ad534474d8fd2ea1d171f00022588f78b446d801 = $this->env->getExtension("native_profiler");
        $__internal_e570cb89785495f3dedc7ba5ad534474d8fd2ea1d171f00022588f78b446d801->enter($__internal_e570cb89785495f3dedc7ba5ad534474d8fd2ea1d171f00022588f78b446d801_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_e570cb89785495f3dedc7ba5ad534474d8fd2ea1d171f00022588f78b446d801->leave($__internal_e570cb89785495f3dedc7ba5ad534474d8fd2ea1d171f00022588f78b446d801_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_141fa1952084ce3bff2f70239064c1645327e2e368deb6a93df1950906df66e5 = $this->env->getExtension("native_profiler");
        $__internal_141fa1952084ce3bff2f70239064c1645327e2e368deb6a93df1950906df66e5->enter($__internal_141fa1952084ce3bff2f70239064c1645327e2e368deb6a93df1950906df66e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_141fa1952084ce3bff2f70239064c1645327e2e368deb6a93df1950906df66e5->leave($__internal_141fa1952084ce3bff2f70239064c1645327e2e368deb6a93df1950906df66e5_prof);

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
