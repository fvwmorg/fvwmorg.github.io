module Jekyll
  class FvwmLexer < Liquid::Block
    def initialize(tag_name, text, tokens)
      super
    end
    require 'open3'
    def render(context)
      content = super
      render = context.registers[:site].config['fvwm2rc']
      if render
        output, e, s = Open3.capture3('pygmentize -x -f html -l _FvwmLexer.py:FvwmLexer', stdin_data: content)
      else
        output = "<div class=\"highlight\"><pre>#{content}</pre></div>"
      end
      output
    end
  end
end
Liquid::Template.register_tag('fvwm2rc', Jekyll::FvwmLexer)
