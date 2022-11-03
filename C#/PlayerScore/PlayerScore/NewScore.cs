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
    public partial class frmNewScore : Form
    {
        public frmNewScore()
        {
            InitializeComponent();
        }


        // Download the form data.
        private void frmNewScore_Load(object sender, EventArgs e)
        {
            loadCombo();
        }

        // Clear the form.
        private void clearForm()
        {
            txtPoints.Text = "";
            txtDate.Text = "";
        }

        // Get the players data from database and insert to the combobox.
        private void loadCombo()
        {
            DataHandling stuff = new DataHandling();
            stuff.getPlayers();

            if (stuff.Err != "0")
            {
                MessageBox.Show(stuff.Err);
                return;
            }

            for (int i = 0; i < stuff.Dt.Rows.Count; i++)
            {
                DataRow row = stuff.Dt.Rows[i];
                cmbPlayers.Items.Add(row["playerID"] + " " + row["firstname"] + " " + row["lastname"] + " " + row["email"] + "");
            }
        }

        // Close the form.
        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        // Checks if a score is found. Otherwise, create a new score.
        private void btnSave_Click(object sender, EventArgs e)
        {
            DataHandling scoreCreator = new DataHandling();
            string sCmb = cmbPlayers.SelectedItem.ToString();
            string sId = sCmb.Split(' ')[0];
            string sEmail = sCmb.Split(' ')[3];
            string sPoints = txtPoints.Text;
            string sDate = scoreCreator.formDataToDatabase(txtDate.Text);
            scoreCreator.newScore(sId, sEmail, sPoints, sDate);

            if (scoreCreator.Err != "0")
            {
                MessageBox.Show(scoreCreator.Err);
                return;
            }

            if (scoreCreator.Found == 1)
            {
                MessageBox.Show("Points are already in the database on this date.", "Info", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }
            else
            {
                MessageBox.Show("A new score has been added to the database", "New Score", MessageBoxButtons.OK, MessageBoxIcon.Information);
                clearForm();
            }
        }
    }
}
