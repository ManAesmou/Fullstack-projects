using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using ClassLibraryPlayers;

namespace PlayerScore
{
    public partial class frmNewPlayer : Form
    {
        public frmNewPlayer()
        {
            InitializeComponent();
        }

        private void frmNewPlayer_Load(object sender, EventArgs e)
        {

        }
    
        private void clearForm()
        {
            txtEmail.Text = "";
            txtFirstName.Text = "";
            txtLastName.Text = "";
            txtPassword.Text = "";
        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        // Checks if the player is found. Otherwise, create a new player.
        private void btnSave_Click(object sender, EventArgs e)
        {
            string sLastname = txtLastName.Text;
            string sFirstname = txtFirstName.Text;
            string sEmail = txtEmail.Text;
            string sPassword = txtPassword.Text;

            DataHandling playerCreator = new DataHandling();
            playerCreator.newPlayer(sFirstname, sLastname, sEmail, sPassword);

            if (playerCreator.Err != "0")
            {
                MessageBox.Show(playerCreator.Err);
                return;
            }

            if (playerCreator.Found == 1)
            {
                MessageBox.Show("The email is already in the database.", "Warning", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }
            else
            {
                MessageBox.Show("A new Player has been added to the database", "New Player", MessageBoxButtons.OK, MessageBoxIcon.Information);
                clearForm();
            }
        }
    }
}
