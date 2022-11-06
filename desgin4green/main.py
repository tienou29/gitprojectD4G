# -*- coding: utf-8 -*-



# --- LIBRARIES ---


import pandas as pd 
from pathlib import Path
import streamlit as st 
from PIL import Image
import base64


# --- PATH SETTINGS ---

current_dir = Path(__file__).parent if "__file__" in locals() else Path.cwd()
bd_cleanedbonnespratiques = current_dir / "assets" / "bonnespratiquesCLEANED.csv"
css_file = current_dir / "styles" / "style.css"
background = current_dir / "assets" / "background1.jpg"

# --- WEBSITE TRASH TEST ---

df = pd.read_csv(bd_cleanedbonnespratiques)


def main(background):
    
    @st.experimental_memo
    def get_img_as_base64(file):
        with open(file, "rb") as f:
            data = f.read()
        return base64.b64encode(data).decode()


    img = get_img_as_base64(background)
    page_bg_img = f"""
    <style>
    [data-testid="stAppViewContainer"] > .main {{
    background-image: url("data:image/png;base64,{img}");
    background-size: 180%;
    background-position: top left;
    background-repeat: repeat;
    background-attachment: local;
    }}
    
    [data-testid="stHeader"] {{
    background: rgba(0,0,0,0);
    }}
    [data-testid="stToolbar"] {{
    right: 2rem;
    }}
    </style>
    """
    

    # --- LOAD CSS, PDF ---
    with open(css_file) as f:
        st.markdown("<style>{}</style>".format(f.read()), unsafe_allow_html=True)

    background = Image.open(background)
    
    st.markdown(page_bg_img, unsafe_allow_html=True)
    st.markdown("<h1 style='text-align: center; color: white;'>Les bonnes pratiques d'écoconception</h1>", unsafe_allow_html=True)
    
    
    selector = st.selectbox('Famille', df['Famille'].unique())
    
    selector2 = st.selectbox('Planet', df["Planet"].unique())
    
    selector3 = st.selectbox('Priorité', df["Priorité"].unique())
    
    values = df[(df["Famille"] == selector) & (df["Planet"] == selector2) & (df['Priorité'] == selector3)] 
    
    hide_table_row_index = """
            <style>
            thead tr th:first-child {display:none}
            tbody th {display:none}
            </style>
            """
            
    st.markdown(hide_table_row_index, unsafe_allow_html=True)
    
    st.markdown("<h4 style='color: white;'>Toutes les bonnes pratiques, faîtes votre trie !</h4>", unsafe_allow_html=True)
    st.write(values)
    
    
    selected_indices = st.multiselect('''Selectionnez l'index de la bonne pratique souhaitée !''',df.index)
    selected_rows = df.loc[selected_indices]
    st.write("### Votre panier ", selected_rows)
    
    st.write('### Télécharger votre panier')
    
    def convert_df(df):
        return df.to_csv(index=False).encode('utf-8')


    csv = convert_df(selected_rows)

    st.download_button(
        "Press to Download",
        csv,
        "votrepanier.csv",
        "text/csv",
        key='download-csv'
        )

    
main(background)
    