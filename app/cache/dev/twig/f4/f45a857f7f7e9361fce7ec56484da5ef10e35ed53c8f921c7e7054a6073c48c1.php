<?php

/* ::layout.html.twig */
class __TwigTemplate_5b9a51e99f96d4a2b8cffc4bd3c295dfcbe07b5540a408ff22f4cc4c4f6669b9 extends Twig_Template
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
        $__internal_3160e3faf80c74b7bacc0b6f73f7ee9e5845a865d8a83ec8adc797f5efec717e = $this->env->getExtension("native_profiler");
        $__internal_3160e3faf80c74b7bacc0b6f73f7ee9e5845a865d8a83ec8adc797f5efec717e->enter($__internal_3160e3faf80c74b7bacc0b6f73f7ee9e5845a865d8a83ec8adc797f5efec717e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::layout.html.twig"));

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
        
        $__internal_3160e3faf80c74b7bacc0b6f73f7ee9e5845a865d8a83ec8adc797f5efec717e->leave($__internal_3160e3faf80c74b7bacc0b6f73f7ee9e5845a865d8a83ec8adc797f5efec717e_prof);

    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $__internal_a2f8056857e6df288f4badb078f0177cd209cfea5814a5daf75a030ccc6268cc = $this->env->getExtension("native_profiler");
        $__internal_a2f8056857e6df288f4badb078f0177cd209cfea5814a5daf75a030ccc6268cc->enter($__internal_a2f8056857e6df288f4badb078f0177cd209cfea5814a5daf75a030ccc6268cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " ADMC ";
        
        $__internal_a2f8056857e6df288f4badb078f0177cd209cfea5814a5daf75a030ccc6268cc->leave($__internal_a2f8056857e6df288f4badb078f0177cd209cfea5814a5daf75a030ccc6268cc_prof);

    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2c87f46a569be2131e3e21e2261cbddb8b844cbbb76c48905e2ec84a0117ffc9 = $this->env->getExtension("native_profiler");
        $__internal_2c87f46a569be2131e3e21e2261cbddb8b844cbbb76c48905e2ec84a0117ffc9->enter($__internal_2c87f46a569be2131e3e21e2261cbddb8b844cbbb76c48905e2ec84a0117ffc9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 12
        echo "            
           <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
        ";
        
        $__internal_2c87f46a569be2131e3e21e2261cbddb8b844cbbb76c48905e2ec84a0117ffc9->leave($__internal_2c87f46a569be2131e3e21e2261cbddb8b844cbbb76c48905e2ec84a0117ffc9_prof);

    }

    // line 37
    public function block_body($context, array $blocks = array())
    {
        $__internal_970b9c172e350519cf4839941b1c7b164f94ebf4d396cc70d2ee2c3d6f2f927c = $this->env->getExtension("native_profiler");
        $__internal_970b9c172e350519cf4839941b1c7b164f94ebf4d396cc70d2ee2c3d6f2f927c->enter($__internal_970b9c172e350519cf4839941b1c7b164f94ebf4d396cc70d2ee2c3d6f2f927c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 38
        echo "                    ";
        
        $__internal_970b9c172e350519cf4839941b1c7b164f94ebf4d396cc70d2ee2c3d6f2f927c->leave($__internal_970b9c172e350519cf4839941b1c7b164f94ebf4d396cc70d2ee2c3d6f2f927c_prof);

    }

    // line 51
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_4a60887ce8e8d46e063fa5373c1215b25e88f677a5334eacc456c8c55df1d7a1 = $this->env->getExtension("native_profiler");
        $__internal_4a60887ce8e8d46e063fa5373c1215b25e88f677a5334eacc456c8c55df1d7a1->enter($__internal_4a60887ce8e8d46e063fa5373c1215b25e88f677a5334eacc456c8c55df1d7a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 52
        echo "        ";
        
        $__internal_4a60887ce8e8d46e063fa5373c1215b25e88f677a5334eacc456c8c55df1d7a1->leave($__internal_4a60887ce8e8d46e063fa5373c1215b25e88f677a5334eacc456c8c55df1d7a1_prof);

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
        return array (  148 => 52,  142 => 51,  135 => 38,  129 => 37,  120 => 12,  114 => 11,  102 => 9,  90 => 53,  88 => 51,  81 => 47,  71 => 39,  69 => 37,  57 => 28,  42 => 15,  40 => 11,  35 => 9,  26 => 2,);
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
/*                 */
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
