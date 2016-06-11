<?php

/* ::layout.html.twig */
class __TwigTemplate_9a9b2006b54c2d36547e86d6e0989baad362ecf0cd10fd162cec212f46fc93d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b7e009d96b8254d08486dfb29b2da40caae79d5e21c18735c1d57c29d156386b = $this->env->getExtension("native_profiler");
        $__internal_b7e009d96b8254d08486dfb29b2da40caae79d5e21c18735c1d57c29d156386b->enter($__internal_b7e009d96b8254d08486dfb29b2da40caae79d5e21c18735c1d57c29d156386b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::layout.html.twig"));

        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name =\"viewport\" content=\"width=device-width,  initial-scale=1\">
        
        <title> ";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "        
        
    </head>
    
    
    <body>
        
        <div class=\"container\">
            <div class=\"jumbotron\" id=\"header\">
                <h1>ADMC Platform</h1>
                <p>
                    Portail d'entreprise
                </p>
                ";
        // line 28
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ADMCCoreBundle:Base:menu"));
        echo "
                ";
        // line 29
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ADMCDSIBundle:Dsi:menu"));
        echo "
            </div>
            
            
            <div class=\"row\">
                                
                <div id=\"content\" class=\"col-md-9\">
                    
                    ";
        // line 37
        $this->displayBlock('body', $context, $blocks);
        // line 39
        echo "                    

                </div>
            </div>
                    
            <hr>
            
            <footer>
                <p>Projet développé par Mr Vougny, Mr Sales, Mr Nardizzi, Mr Fourcault. DATE: ";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</p>
            </footer>
        </div>
            
        ";
        // line 51
        $this->displayBlock('javascript', $context, $blocks);
        // line 53
        echo "        
        
        
    </body>
    
</html>";
        
        $__internal_b7e009d96b8254d08486dfb29b2da40caae79d5e21c18735c1d57c29d156386b->leave($__internal_b7e009d96b8254d08486dfb29b2da40caae79d5e21c18735c1d57c29d156386b_prof);

    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $__internal_7833625edaa082c68f1e9b91d63ac230bf234edfd459a6f5fb0d78853db9db28 = $this->env->getExtension("native_profiler");
        $__internal_7833625edaa082c68f1e9b91d63ac230bf234edfd459a6f5fb0d78853db9db28->enter($__internal_7833625edaa082c68f1e9b91d63ac230bf234edfd459a6f5fb0d78853db9db28_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " ADMC ";
        
        $__internal_7833625edaa082c68f1e9b91d63ac230bf234edfd459a6f5fb0d78853db9db28->leave($__internal_7833625edaa082c68f1e9b91d63ac230bf234edfd459a6f5fb0d78853db9db28_prof);

    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b5baa26c12737036d1f76a11b84c9d6a7ab710fbfdcf01ae7878fbcefe6dd242 = $this->env->getExtension("native_profiler");
        $__internal_b5baa26c12737036d1f76a11b84c9d6a7ab710fbfdcf01ae7878fbcefe6dd242->enter($__internal_b5baa26c12737036d1f76a11b84c9d6a7ab710fbfdcf01ae7878fbcefe6dd242_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 12
        echo "            
           <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
        ";
        
        $__internal_b5baa26c12737036d1f76a11b84c9d6a7ab710fbfdcf01ae7878fbcefe6dd242->leave($__internal_b5baa26c12737036d1f76a11b84c9d6a7ab710fbfdcf01ae7878fbcefe6dd242_prof);

    }

    // line 37
    public function block_body($context, array $blocks = array())
    {
        $__internal_051b4c8ccc842a9e2cdac0489ad0c62015237f3fb2af318c805be043173d43c5 = $this->env->getExtension("native_profiler");
        $__internal_051b4c8ccc842a9e2cdac0489ad0c62015237f3fb2af318c805be043173d43c5->enter($__internal_051b4c8ccc842a9e2cdac0489ad0c62015237f3fb2af318c805be043173d43c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 38
        echo "                    ";
        
        $__internal_051b4c8ccc842a9e2cdac0489ad0c62015237f3fb2af318c805be043173d43c5->leave($__internal_051b4c8ccc842a9e2cdac0489ad0c62015237f3fb2af318c805be043173d43c5_prof);

    }

    // line 51
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_6ebd877c324f5debc764727d4d577be4ffc7e9c7864b5bf53be83a29748add7f = $this->env->getExtension("native_profiler");
        $__internal_6ebd877c324f5debc764727d4d577be4ffc7e9c7864b5bf53be83a29748add7f->enter($__internal_6ebd877c324f5debc764727d4d577be4ffc7e9c7864b5bf53be83a29748add7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 52
        echo "        ";
        
        $__internal_6ebd877c324f5debc764727d4d577be4ffc7e9c7864b5bf53be83a29748add7f->leave($__internal_6ebd877c324f5debc764727d4d577be4ffc7e9c7864b5bf53be83a29748add7f_prof);

    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 52,  145 => 51,  138 => 38,  132 => 37,  123 => 12,  117 => 11,  105 => 9,  93 => 53,  91 => 51,  84 => 47,  74 => 39,  72 => 37,  61 => 29,  57 => 28,  42 => 15,  40 => 11,  35 => 9,  26 => 2,);
    }
}
/* {# empty Twig template #}*/
/* */
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta name ="viewport" content="width=device-width,  initial-scale=1">*/
/*         */
/*         <title> {% block title %} ADMC {% endblock %}</title>*/
/*         */
/*         {% block stylesheets %}*/
/*             */
/*            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">*/
/*         {% endblock %}*/
/*         */
/*         */
/*     </head>*/
/*     */
/*     */
/*     <body>*/
/*         */
/*         <div class="container">*/
/*             <div class="jumbotron" id="header">*/
/*                 <h1>ADMC Platform</h1>*/
/*                 <p>*/
/*                     Portail d'entreprise*/
/*                 </p>*/
/*                 {{ render(controller("ADMCCoreBundle:Base:menu")) }}*/
/*                 {{ render(controller("ADMCDSIBundle:Dsi:menu")) }}*/
/*             </div>*/
/*             */
/*             */
/*             <div class="row">*/
/*                                 */
/*                 <div id="content" class="col-md-9">*/
/*                     */
/*                     {% block body %}*/
/*                     {% endblock %}*/
/*                     */
/* */
/*                 </div>*/
/*             </div>*/
/*                     */
/*             <hr>*/
/*             */
/*             <footer>*/
/*                 <p>Projet développé par Mr Vougny, Mr Sales, Mr Nardizzi, Mr Fourcault. DATE: {{ 'now'|date('Y') }}</p>*/
/*             </footer>*/
/*         </div>*/
/*             */
/*         {% block javascript %}*/
/*         {% endblock %}*/
/*         */
/*         */
/*         */
/*     </body>*/
/*     */
/* </html>*/
