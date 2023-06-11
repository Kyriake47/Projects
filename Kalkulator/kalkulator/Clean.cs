using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace kalkulator
{
    internal class Clean
    {

        public void clean(Write write,Label label)
        {
            if (write.Check == true)
            {
                write.Check = false;
                label.Text = "";
            }
        }


    }
}
